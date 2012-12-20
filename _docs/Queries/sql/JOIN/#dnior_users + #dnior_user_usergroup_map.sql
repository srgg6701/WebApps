SELECT DISTINCT u.id
FROM dnior_users as u, dnior_user_usergroup_map as g
WHERE u.id = g.user_id AND g.group_id >= 6