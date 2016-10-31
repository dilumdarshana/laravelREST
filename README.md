# laravelREST
Example application for meeting schedular.

# Available APIs
- Create user (URL: api/v1/user, method: POST, input: [name, email, password], output:[])
- Signin user (URL: api/v1/user/signin, method: POST, input: [email, password], output: auth token)
- Create a meeting (URL: api/v1/meeting, method: POST, input: [title, description, time, user], output: [meeting info])
- Update a meeting (URL: api/v1/meeting, method: PATCH, input: [title, description, time, user, meeting ID], output: [meeting info])
- Delete a meeting (URL: api/v1/meeting, method: DELETE, input: [meeting ID], output: [])
- Show a signle meeting (URL: api/v1/meeting/<meeting ID>, method: GET, input: [meeting ID], output: [meeting info])
- List all available meetings (URL: api/v1/meeting, method: GET, input: [], output: [list of all meetings])
- Register for a meeting (URL: api/v1/meeting/registration, method: POST, input: [meeting ID, user ID], output: [])
- Unregister from a registered meeting (URL: api/v1/meeting/registration/<meeting ID>/<user ID>, method: DELETE, input: [meeting ID, user ID], output: [])

# How to create controllers
php artisan make:controller MeetingController --resource

--resource will create bunch of methods for CRUD operations automatically

# How to create model
php artisan make:model Meeting -m

-m will create migrate script file also under database/migrations folder

php artisan make:migration creat_meeting_user_table

php artisan migrate - will create all changes against migrate scripts

# How to use JWT(Json Web Token)

- Install dependancy: composer require tymon/jwt-auth


