USER MANUAL
==============

In order to use the application you have to point apache to the “public” folder of Laravel. 
--------------

- Create a database called “galaxy”;
-	if you are unable to use your root account in your development environment, create an account and set the .env in the Laravel root folder accordingly.
-	Configure Apache config file in order to set up your vhost environment or just use localhost later on.
-	From within your Laravel project folder run: “php artisan migrate”
-	Run “php artisan db:seed” in order to populate the database with 2 mockup events
-	Access from your browser, for example, “http://<yourlocalhost>/public/api/fields?id_event=97&language=ro” in order to populate the “fields” table of the database with all the fields that will retrieved over the next step;
-	Access from your browser, for example, “http://<yourlocalhost>/public/?id_event=97&language=ro” to view the form
-	Submit the form once you are done

You can check that the data are stored in the DB with a tool like Workbench or PHP Myadmin.
