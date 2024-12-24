drop schema if exists aceda_db;

create schema aceda_db;
use aceda_db;

create table user(
    id int primary key auto_increment,
    name varchar(140) not null,
    email varchar(255) not null,
    password varchar(255) not null,
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp on update current_timestamp
);

create table curso(
    int id primary key auto_increment,
    name varchar(255) not null,
    description text not null,
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp on update current_timestamp
);

create table voluntario(
    int id primary key auto_increment,
    name varchar(140) not null,
    resumo varchar(255) not null
    cargo varchar(50) not null,
    portofolio varchar(2083) not null,
    periodo_admissão Date not null,
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp on update current_timestamp
);

create table post(
    id int primary key auto_increment,
    title varchar(255) not null,
    content text not null,
    user_id int not null,
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp on update current_timestamp,
    foreign key (user_id) references user(id)
        on update cascade;
);

create table categories(
    id int primary key auto_increment,
    name varchar(40) not null,
    description text not null,
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp on update current_timestamp
);


create table post_categories(
    id int primary key auto_increment,
    post_id int not null,
    category_id int not null,
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp timestamp on update current_timestamp,
    foreign key (post_id) references post(id)
        on update cascade,
    foreign key (category_id) references categories(id)
        on update cascade;
);

