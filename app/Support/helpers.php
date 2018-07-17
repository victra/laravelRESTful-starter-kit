<?php

if (!function_exists('createHashId')) {
    /**
     * @param $entityClassName
     * @param int $digit
     * @return string
     */
    function createHashId($entityClassName, $digit = 8)
    {
        do {
            $hashId = strtolower(str_random($digit));

            /** @var \Illuminate\Validation\Validator $validator */
            $validator = validator([
                "unique" => $hashId
            ], [
                "unique" => "unique:$entityClassName,hash_id"
            ]);

        } while ($validator->fails());

        return $hashId;
    }
}