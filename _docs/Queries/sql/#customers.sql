SELECT surname,
       middle_name,
       sex,
       DATE_FORMAT(birthday, '%e.%c.%Y') AS 'birthday',
       work_phone,
       mobila,
       skype,
       company_name,
       city,
       region,
       zip_code	      
  FROM dnior_webapps_customers