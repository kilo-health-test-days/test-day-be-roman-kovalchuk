curl --location 'http://localhost/customer' \
--header 'Content-Type: application/json' \
--data-raw '{
"email": "westside2202@gmail.com",
"phone": "+380667069697",
"push_channel": "95b8aa4e-4ecc-4423-9ad4-5e8e4ab53a5a"
}'

curl --location 'http://localhost/message' \
--header 'Content-Type: application/json' \
--data '{
"message": "Some sample text11",
"channels": ["push"],
"customers": [2]
}'

Leftovers:
- request validations
- better async transport
- exceptions handling
- logs