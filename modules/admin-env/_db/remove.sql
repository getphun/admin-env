DELETE FROM `user_perms_chain` WHERE `user_perms` IN (
    SELECT `id` FROM `user_perms` WHERE name = 'update_env'
);

DELETE FROM `user_perms` WHERE name = 'update_env';