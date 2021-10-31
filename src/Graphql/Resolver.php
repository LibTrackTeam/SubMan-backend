<?php

namespace SubMan\Graphql;

class Resolver
{

    public static function category()
    {
        // $repo = new MockCategoryRepository();
        return [
            [
                "id" => 1,
                "name" => "movies",
                "icon" => "x32.png",
                "color" => "red"
            ],
            [
                "id" => 2,
                "name" => "blog",
                "icon" => "x32.png",
                "color" => "blue"
            ],
            [
                "id" => 3,
                "name" => "podcast",
                "icon" => "x32.png",
                "color" => "pink"
            ],
            [
                "id" => 4,
                "name" => "gifts",
                "icon" => "x32.png",
                "color" => "green"
            ]
        ];
    }

    public static function service()
    {
        return [
            [
                "id" => 1,
                "name" => "Netflix",
                "icon" => "logo.png",
                "color" => "red"
            ],
            [
                "id" => 2,
                "name" => "Youtube",
                "icon" => "logo.png",
                "color" => "red"
            ],
            [
                "id" => 3,
                "name" => "Goodreads",
                "icon" => "logo.png",
                "color" => "blue"
            ],
            [
                "id" => 4,
                "name" => "Medium",
                "icon" => "logo.png",
                "color" => "black"
            ]
        ];
    }

    public static function subscription()
    {
        return [
            [
                "id" => 1,
                "service_id" => 1,
                "cost" => 11.99,
                "description" => "every movie you want",
                "start_date" => "11:24 12th June 2021",
                "bill_date" => "11:24 12th June 2021",
                "cycle" => "6 months",
                "reminder" => True,
                "category_id" => 1,
                "archived" => True,
            ],
            [
                "id" => 2,
                "service_id" => 2,
                "cost" => 4.99,
                "description" => "other movies i watch",
                "start_date" => "11:24 12th June 2021",
                "bill_date" => "11:24 12th June 2021",
                "cycle" => "1 year",
                "reminder" => True,
                "category_id" => 2,
                "archived" => False,
            ],
            [
                "id" => 3,
                "service_id" => 3,
                "cost" => 18.99,
                "description" => "every book i read",
                "start_date" => "11:24 12th June 2021",
                "bill_date" => "11:24 12th June 2021",
                "cycle" => "1 year",
                "reminder" => True,
                "category_id" => 1,
                "archived" => False,
            ]
        ];
    }

    public static function user()
    {
        return [
            [
                "id" => 1,
                "uid" => "11111",
                "currency" => "NGN",
                "message_token" => "poajenfae",
            ],
            [
                "id" => 2,
                "uid" => "222222",
                "currency" => "GHS",
                "message_token" => "awerewrw",
            ],
            [
                "id" => 3,
                "uid" => "333333",
                "currency" => "USD",
                "message_token" => "adfae4443",
            ],
            [
                "id" => 4,
                "uid" => "44444",
                "currency" => "EUR",
                "message_token" => "ioiaopo9jno",
            ]

        ];
    }
}
