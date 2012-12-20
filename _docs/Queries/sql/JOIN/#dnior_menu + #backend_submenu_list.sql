SELECT bsl.id, bsl.menu_id AS 'menu id', mn.id AS menu_id, 
bsl.menu_text AS 'menu text', bsl.hidden, mn.title, mn.alias, mn.path, mn.link
  FROM dnior_menu as mn
LEFT JOIN dnior_webapps_backend_submenu_list as bsl ON bsl.menu_id = mn.id
 where `title` LIKE 'COM_COLLECTOR1_%'
 ORDER BY 'menu text', hidden DESC