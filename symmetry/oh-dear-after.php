<?php

class Check
{
    // ...

    public function needsToRun(): bool
    {
        if ($this->disabled()) {
            return false;
        }

        if ($this->alreadyScheduledOrIsRunning()) {
            return false;
        }

        if ($this->firstRun()) {
            return true;
        }

        if ($this->retryUptimeCheck()) {
            return true;
        }

        if ($this->lastRunCrashed()) {
            return true;
        }

        return $this->readyToRerun();
    }

    // ...

}
