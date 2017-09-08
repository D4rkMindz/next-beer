<?php

namespace App\Table;

/**
 * Class UserTable
 */
class UserTable extends AppTable
{
    protected $table = 'users';

    /**
     * Check if username exists.
     *
     * @param string $username - with username
     * @return bool true if username exists
     */
    public function existsUsername(string $username): bool
    {
        $query = $this->newSelect();
        $query->select('username')->where(['username'=> $username]);
        $row = $query->execute()->fetch();
        return !empty($row);
    }

    /**
     * Get user by ID.
     *
     * @param int $userId - user ID
     * @return array $row - single user entity
     */
    public function getUserById(int $userId): array
    {
        $fields = [
            'users.username',
            'roles.level',
            'roles.title',
            'people.first_name',
            'people.last_name',
            'address' => 'people.address',
            'postcode' => 'postcodes.number',
        ];
        $query = $this->newSelect();
        $query->select($fields)
            ->join([
                'roles' => [
                    'table' => 'roles',
                    'type' => 'INNER',
                    'conditions' => 'roles.id = users.role_id'
                ],
                'people' => [
                    'table'=> 'people',
                    'type' => 'INNER',
                    'conditions' => 'people.id = users.person_id'
                ],
                'postcodes' => [
                    'table'=> 'postcodes',
                    'type'=> 'INNER',
                    'conditions' => 'postcodes.id = people.postcode_id'
                ]
            ])
            ->where(['users.id' => $userId])
            ->limit(1);
        $row = $query->execute()->fetch();
        if (!$row){
            return [];
        }
        return $row;
    }
}
