#!/bin/bash
curl -d '{"ci":"'${1}'"}' -H 'Content-Type: application/json' http://localhost:5001/capturaRest

