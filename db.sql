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
    id int primary key auto_increment,
    name varchar(255) not null,
    description text not null,
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp on update current_timestamp
);

create table voluntario(
    id int primary key auto_increment,
    name varchar(140) not null,
    resumo varchar(255) not null,
    cargo varchar(50) not null,
    linkedin_url varchar(2083) not null,
    periodo_admissão Date not null,
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp on update current_timestamp
);

create table post(
    id int primary key auto_increment,
    title varchar(255) not null,
    slug varchar(255) not null,
    status boolean not null,
    content text not null,
    user_id int not null,
    image_path varchar(255),
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp on update current_timestamp,
    foreign key (user_id) references user(id)
        on update cascade
);

create table categoria(
    id int primary key auto_increment,
    name varchar(40) not null,
    description text not null,
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp on update current_timestamp
);


create table post_categoria(
    post_id int not null,
    categoria_id int not null,
    PRIMARY KEY (post_id, category_id),
    CONSTRAINT fk_post FOREIGN KEY (post_id) REFERENCES post(id) ON DELETE CASCADE,
    CONSTRAINT fk_categoria FOREIGN KEY (categoria_id) REFERENCES categoria(id) ON DELETE CASCADE
);
