<?php
namespace SubMan\Graphql;

class SDL{
    /**
     * return Standard Definition Language
     * 
     * @return string
     */
    public static function get() {
        return '
            type Query {
                category: [Category]
                service: [Service]
                subscription: [Subscription]
                user: [User]
            }

            type Category {
                id: Int
                name: String
                icon: String
                color: String
            }

            type Service {
                id: Int
                name: String
                icon: String
                color: String
            }

            type Subscription {
                id: Int
                service_id: Int
                cost: Float
                description: String
                start_date: String
                bill_date: String
                cycle: String
                reminder: Boolean
                category_id: Int
                archived: Boolean
                service: Service
                category: Category
            }

            type User {
                id: Int
                uid: String
                currency: String
                message_token: String
            }
        ';
    }
}