drop sequence if exists user_id_seq;

create sequence user_id_seq;
select setval('user_id_seq', 10000);