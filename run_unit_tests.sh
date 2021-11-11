#!/bin/bash

# reset db
mysql -u root -p internetbazar < /home/joe/bazaar/data/sql/lib.model.schema.sql

# load test data
php symfony propel:data-load
# run unit tests
php symfony test:unit