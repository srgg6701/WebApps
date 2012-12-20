SELECT a.username, a.name, a.surname, a.middle_name, 
    a.work_phone, a.mobila, a.skype, 
    a.company_name, a.city, a.region,  
       IF ( a.sex = "f","female",
           IF (a.sex = "m","male","")
          ) AS sex, `name` AS editor
FROM `dnior_users` AS a
WHERE a.id IN (
				SELECT DISTINCT customer_id
        FROM dnior_webapps_customer_orders
        WHERE customer_id >0
            UNION
        SELECT DISTINCT customer_id
        FROM dnior_webapps_customer_site_options
        WHERE customer_id >0
			)
ORDER BY a.surname asc