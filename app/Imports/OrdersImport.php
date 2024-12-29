<?php

namespace App\Imports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OrdersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public $userId;

    // Constructor to accept userId
    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    // This method will be used to process each row in the Excel file
    public function model(array $row)
    {
        return new Order([
            'user_id' => $this->userId,
            'order_number' => $row['number'] ?? null, // Use null if the key doesn't exist
            'description' => $row['description'] ?? null,
            'amount' => $row['amount'] ?? 0, // Default to 0 if missing
        ]);
    }
}
