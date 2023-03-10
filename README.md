## Reto de la API de Códigos Postales

Este proyecto es parte del reto propuesto por Backbone Systems para replicar la funcionalidad de la API de códigos postales. Se utiliza el framework Laravel y se utiliza una fuente de información proporcionada por Backbone Systems. El objetivo es que el tiempo de respuesta promedio sea menor a 300 ms, pero entre menor sea, mejor.

## Cómo utilizar la API

La API es un endpoint GET que recibe un código postal como parámetro y devuelve información relacionada con ese código. La sintaxis para utilizar la API es la siguiente:
[GET] https://jobs.backbonesystems.io/api/zip-codes/{zip_code}
- la url utilizada fue: 
- [GET] http://54.226.115.33/api/zip-codes/{zip_code}

## Publicacion de la API

Para que la API pueda ser probada, se debe publicar en un servidor. En este proyecto se utilizó Amazon Web Services (AWS) y se configuró una instancia de EC2 con Laravel.

## Carga de datos

Para cargar la información en formato CSV, se utilizaron comandos de Laravel. Es importante tener en cuenta que la información cargada es la misma que la proporcionada por Backbone Systems y que la información se almacena en una base de datos relacional para mejorar el rendimiento de la API.

