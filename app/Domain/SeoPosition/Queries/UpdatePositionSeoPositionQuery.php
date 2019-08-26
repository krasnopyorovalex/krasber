<?php

namespace App\Domain\SeoPosition\Queries;

use App\SeoPosition;

/**
 * Class UpdatePositionSeoPositionQuery
 * @package App\Domain\SeoPosition\Queries
 */
class UpdatePositionSeoPositionQuery
{
    /**
     * @var array
     */
    private $data;

    /**
     * UpdatePositionSeoPositionQuery constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->data as $position => $id) {
            SeoPosition::where('id', $id)->update(['pos' => $position]);
        }
    }
}
