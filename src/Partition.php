<?php

namespace AdrianDmitroca\QuickSelect;

class Partition
{

    private $pivotIndex = 0;
    private $pivotValue = 0;
    private $left = 0;
    private $right = 0;

    /**
     * Partition constructor.
     *
     * @param array $numbers
     */
    public function __construct(array $numbers)
    {
        $this->numbers = $numbers;
    }

    /**
     * @param int      $left
     * @param int|null $right
     *
     * @return array
     */
    public function partition(int $left, int $right) : array
    {
        $this->pivotIndex = $left;
        $this->pivotValue = $this->numbers[$this->pivotIndex];

        $this->swap($this->pivotIndex, $left);

        $this->right = $right;
        $this->left  = $left;

        while ($this->left < $this->right) {
            while ($this->left < $this->right && $this->numbers[$this->left] <= $this->pivotValue) {
                $this->left++;
            }

            while ($this->numbers[$this->right] > $this->pivotValue) {
                $this->right--;
            }

            if ($this->left < $this->right) {
                $this->swap($this->left, $this->right);
            }
        }

        $this->swap($this->pivotIndex, $this->right);

        $this->pivotIndex = $this->right;

        return $this->numbers;
    }

    /**
     * @return int
     */
    public function getPivotIndex() : int
    {
        return $this->pivotIndex;
    }

    /**
     * @param int $a
     * @param int $b
     */
    private function swap(int $a, int $b)
    {
        $temp              = $this->numbers[$b];
        $this->numbers[$b] = $this->numbers[$a];
        $this->numbers[$a] = $temp;
    }
}