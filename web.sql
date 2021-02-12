/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     2/6/2021 8:44:30 PM                          */
/*==============================================================*/


drop table if exists TABEL_ADMIN;

drop table if exists TABEL_BANGUNAN;

drop table if exists TABEL_GAMBAR;

drop table if exists TABEL_KOMENTAR;

/*==============================================================*/
/* Table: TABEL_ADMIN                                           */
/*==============================================================*/
create table TABEL_ADMIN
(
   NO                   int not null auto_increment,
   USERNAME             varchar(100),
   PASSWORD             varchar(100),
   primary key (NO)
);

/*==============================================================*/
/* Table: TABEL_BANGUNAN                                        */
/*==============================================================*/
create table TABEL_BANGUNAN
(
   BANGUNAN_ID          int not null auto_increment,
   BANGUNAN_NAMA        varchar(100),
   BANGUNAN_LAT         varchar(100),
   BANGUNAN_LONG        varchar(100),
   BANGUNAN_DESKRIPSI   text,
   primary key (BANGUNAN_ID)
);

/*==============================================================*/
/* Table: TABEL_GAMBAR                                          */
/*==============================================================*/
create table TABEL_GAMBAR
(
   ID_GAMBAR            int not null auto_increment,
   BANGUNAN_ID          int,
   NAMA_GAMBAR          varchar(100),
   primary key (ID_GAMBAR)
);

/*==============================================================*/
/* Table: TABEL_KOMENTAR                                        */
/*==============================================================*/
create table TABEL_KOMENTAR
(
   ID_KOMENTAR          int not null auto_increment,
   BANGUNAN_ID          int,
   NAMA_LENGKAP         varchar(100),
   ISI_KOMENTAR         varchar(100),
   primary key (ID_KOMENTAR)
);

alter table TABEL_GAMBAR add constraint FK_RELATIONSHIP_1 foreign key (BANGUNAN_ID)
      references TABEL_BANGUNAN (BANGUNAN_ID) on delete restrict on update restrict;

alter table TABEL_KOMENTAR add constraint FK_RELATIONSHIP_2 foreign key (BANGUNAN_ID)
      references TABEL_BANGUNAN (BANGUNAN_ID) on delete restrict on update restrict;

