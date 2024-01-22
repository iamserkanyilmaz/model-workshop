<?php
namespace App\Services\VideoTypes;

interface VideoType {
    /**
     * @param array $dataArr
     * @return int
     */
    public function create(array $dataArr): int;

    /**
     * @param int $id
     * @return array
     */
    public function get(int $id): array;

    /**
     * @param int $id
     * @param array $dataArr
     * @return void
     */
    public function update(int $id, array $dataArr): void;
}
