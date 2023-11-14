create database `blog` if not exists;

CREATE TABLE `utilisateurs` (
    id_user int not null PRIMARY KEY AUTO_INCREMENT,
    mail text,
    pseudo text,
    mdp text,
    admin boolean
) if not exists;

create table `billets` (
    id_billet int not null PRIMARY KEY AUTO_INCREMENT,
    titre text,
    contenu_post text,
    date_post date,
    ext_id_auteur int
) if not exists;

create table `commentaires` (
    id_commentaire int not null PRIMARY KEY AUTO_INCREMENT,
    ext_id_auteur int,
    ext_id_billet int,
    contenu_commentaire text,
    date_commentaire date
) if not exists;