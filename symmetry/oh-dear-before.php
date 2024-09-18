<?php

class Check
{
    // ...

    public function needsToRun(): bool
    {
        if (!$this->site->team->hasActiveSubscriptionOrIsOnGenericTrial()) {
            return false;
        }

        if (!$this->enabled) {
            return false;
        }

        if ($this->type === CheckType::UPTIME && optional($this->latestRun())->hasFailed()) {
            return true;
        }

        if (is_null($this->latestRun())) {
            return true;
        }

        if ($this->previousRunHasCrashed()) {
            return true;
        }

        if ($this->checkHasAlreadyBeenScheduledOrIsRunning()) {
            return false;
        }

        return $this->latestRun()->hasEndedMoreThanMinutesAgo($this->minutesBetweenRuns());
    }

    // ...

}
