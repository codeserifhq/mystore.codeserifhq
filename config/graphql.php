<?php

use example\Type\ExampleType;
use example\Query\ExampleQuery;
use example\Mutation\ExampleMutation;
use example\Type\ExampleRelationType;

return [

    // The prefix for routes
    'prefix' => 'graphql',

    // The routes to make GraphQL request. Either a string that will apply
    // to both query and mutation or an array containing the key 'query' and/or
    // 'mutation' with the according Route
    //
    // Example:
    //
    // Same route for both query and mutation
    //
    // 'routes' => 'path/to/query/{graphql_schema?}',
    //
    // or define each route
    //
    // 'routes' => [
    //     'query' => 'query/{graphql_schema?}',
    //     'mutation' => 'mutation/{graphql_schema?}',
    // ]
    //
    'routes' => '{graphql_schema?}',

    // The controller to use in GraphQL request. Either a string that will apply
    // to both query and mutation or an array containing the key 'query' and/or
    // 'mutation' with the according Controller and method
    //
    // Example:
    //
    // 'controllers' => [
    //     'query' => '\Rebing\GraphQL\GraphQLController@query',
    //     'mutation' => '\Rebing\GraphQL\GraphQLController@mutation'
    // ]
    //
    'controllers' => \Rebing\GraphQL\GraphQLController::class.'@query',

    // Any middleware for the graphql route group
    'middleware' => [],

    // Additional route group attributes
    //
    // Example:
    //
    // 'route_group_attributes' => ['guard' => 'api']
    //
    'route_group_attributes' => [],

    // The name of the default schema used when no argument is provided
    // to GraphQL::schema() or when the route is used without the graphql_schema
    // parameter.
    'default_schema' => 'default',

    // The schemas for query and/or mutation. It expects an array of schemas to provide
    // both the 'query' fields and the 'mutation' fields.
    //
    // You can also provide a middleware that will only apply to the given schema
    //
    // Example:
    //
    //  'schema' => 'default',
    //
    //  'schemas' => [
    //      'default' => [
    //          'query' => [
    //              'users' => 'App\GraphQL\Query\UsersQuery'
    //          ],
    //          'mutation' => [
    //
    //          ]
    //      ],
    //      'user' => [
    //          'query' => [
    //              'profile' => 'App\GraphQL\Query\ProfileQuery'
    //          ],
    //          'mutation' => [
    //
    //          ],
    //          'middleware' => ['auth'],
    //      ],
    //      'user/me' => [
    //          'query' => [
    //              'profile' => 'App\GraphQL\Query\MyProfileQuery'
    //          ],
    //          'mutation' => [
    //
    //          ],
    //          'middleware' => ['auth'],
    //      ],
    //  ]
    //
    'schemas' => [
        'default' => [
            'query' => [
                'users' => \App\GraphQL\Query\UserQuery::class,
            ],
            'mutation' => [
                'signIn'  => \App\GraphQL\Mutation\Auth\SignInMutation::class,
            ],
            'middleware' => [],
            'method'     => ['get', 'post'],
        ],
        'secret' => [
            'query' => [
                'users' => \App\GraphQL\Query\UserQuery::class,
            ],
            'mutation' => [
                'signOut'     => \App\GraphQL\Mutation\Auth\SignOutMutation::class,
                'insertUser'  => \App\GraphQL\Mutation\Insert\InsertUserMutation::class,
                'updateUser'  => \App\GraphQL\Mutation\Update\UpdateUserMutation::class
            ],
            'middleware' => ['auth:api'],
            'method'     => ['get', 'post'],
        ],
    ],

    // The types available in the application. You can then access it from the
    // facade like this: GraphQL::type('user')
    //
    // Example:
    //
    // 'types' => [
    //     'user' => 'App\GraphQL\Type\UserType'
    // ]
    //
    'types' => [
        'accessToken'                  => \App\GraphQL\Type\AccessTokenType::class,
        'userAggregationType'              => \App\GraphQL\Type\UserAggregationType::class,
        'permissionAggregationType'        => \App\GraphQL\Type\PermissionAggregationType::class,
        'companyAggregationType'           => \App\GraphQL\Type\CompanyAggregationType::class,
        'partnerAggregationType'           => \App\GraphQL\Type\PartnerAggregationType::class,
        'permissionModuleAggregationType'  => \App\GraphQL\Type\PermissionModuleAggregationType::class,
        'permissionSectionAggregationType' => \App\GraphQL\Type\PermissionSectionAggregationType::class,
        'departmentAggregationType'        => \App\GraphQL\Type\DepartmentAggregationType::class,
        'jobAggregationType'               => \App\GraphQL\Type\JobAggregationType::class,
        'contactAggregationType'           => \App\GraphQL\Type\ContactAggregationType::class,
        'addressAggregationType'           => \App\GraphQL\Type\AddressAggregationType::class,
        'stockInboundAggregationType'      => \App\GraphQL\Type\StockInboundAggregationType::class,
        'stockOutboundAggregationType'     => \App\GraphQL\Type\StockOutboundAggregationType::class,
        'branchAggregationType'            => \App\GraphQL\Type\BranchAggregationType::class,
        'saleAggregationType'              => \App\GraphQL\Type\SaleAggregationType::class,
        'productAggregationType'           => \App\GraphQL\Type\ProductAggregationType::class,
        'productCategoryAggregationType'   => \App\GraphQL\Type\ProductCategoryAggregationType::class,
        'productCategory'                  => \App\GraphQL\Type\ProductCategoryType::class,
        'product'                          => \App\GraphQL\Type\ProductType::class,
        'productCustomProperty'            => \App\GraphQL\Type\ProductCustomPropertyType::class,
        'sale'                             => \App\GraphQL\Type\SaleType::class,
        'stockOutbound'                    => \App\GraphQL\Type\StockOutboundType::class,
        'branch'                           => \App\GraphQL\Type\BranchType::class,
        'stockInbound'                     => \App\GraphQL\Type\StockInboundType::class,
        'contact'                          => \App\GraphQL\Type\ContactType::class,
        'address'                          => \App\GraphQL\Type\AddressType::class,
        'job'                              => \App\GraphQL\Type\JobType::class,
        'department'                       => \App\GraphQL\Type\DepartmentType::class,
        'user'                             => \App\GraphQL\Type\UserType::class,
        'permission'                       => \App\GraphQL\Type\PermissionType::class,
        'company'                          => \App\GraphQL\Type\CompanyType::class,
        'partner'                          => \App\GraphQL\Type\PartnerType::class,
        'permissionSection'                => \App\GraphQL\Type\PermissionSectionType::class,
        'permissionModule'                 => \App\GraphQL\Type\PermissionModuleType::class,
        'role'                             => \App\GraphQL\Type\RoleType::class, 
    ],

    // This callable will be passed the Error object for each errors GraphQL catch.
    // The method should return an array representing the error.
    // Typically:
    // [
    //     'message' => '',
    //     'locations' => []
    // ]
    'error_formatter' => ['\Rebing\GraphQL\GraphQL', 'formatError'],

    /*
     * Custom Error Handling
     *
     * Expected handler signature is: function (array $errors, callable $formatter): array
     *
     * The default handler will pass exceptions to laravel Error Handling mechanism
     */
    'errors_handler' => ['\Rebing\GraphQL\GraphQL', 'handleErrors'],

    // You can set the key, which will be used to retrieve the dynamic variables
    'params_key'    => 'variables',

    /*
     * Options to limit the query complexity and depth. See the doc
     * @ https://github.com/webonyx/graphql-php#security
     * for details. Disabled by default.
     */
    'security' => [
        'query_max_complexity'  => null,
        'query_max_depth'       => null,
        'disable_introspection' => false,
    ],

    /*
     * You can define your own pagination type.
     * Reference \Rebing\GraphQL\Support\PaginationType::class
     */
    'pagination_type' => \Rebing\GraphQL\Support\PaginationType::class,

    /*
     * Config for GraphiQL (see (https://github.com/graphql/graphiql).
     */
    'graphiql' => [
        'prefix'     => '/graphiql/{graphql_schema?}',
        'controller' => \Rebing\GraphQL\GraphQLController::class.'@graphiql',
        'middleware' => [],
        'view'       => 'graphql::graphiql',
        'display'    => env('ENABLE_GRAPHIQL', true),
    ],

    /*
     * Overrides the default field resolver
     * See http://webonyx.github.io/graphql-php/data-fetching/#default-field-resolver
     *
     * Example:
     *
     * ```php
     * 'defaultFieldResolver' => function ($root, $args, $context, $info) {
     * },
     * ```
     * or
     * ```php
     * 'defaultFieldResolver' => [SomeKlass::class, 'someMethod'],
     * ```
     */
    'defaultFieldResolver' => null,

    /*
     * Any headers that will be added to the response returned by the default controller
     */
    'headers' => [],

    /*
     * Any JSON encoding options when returning a response from the default controller
     * See http://php.net/manual/function.json-encode.php for the full list of options
     */
    'json_encoding_options' => 0,
];
