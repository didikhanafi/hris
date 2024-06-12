INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `akses`, `remember_token`, `created_at`, `updated_at`) VALUES (1, 'Administrator', 'admin@hrisapp.com', NULL, '$2y$12$tGh58Gg5bnrRDZIQAloqgegeEPzpN2HwciBhMoV.God4x0CbjIDoG', '99', NULL, '2024-05-26 22:25:11', '2024-05-26 22:25:11');

INSERT INTO `db_hrisapp`.`companies` (`companiescode`, `companies`, `created_at`, `updated_at`) VALUES ('MJS', 'PT Multi Jaya Sentosa', '2024-05-27 12:13:09', '2024-05-27 12:13:10');
INSERT INTO `db_hrisapp`.`companies` (`companiescode`, `companies`, `created_at`, `updated_at`) VALUES ('GPP', 'PT Gadin Puri Perkasa', '2024-05-27 12:13:09', '2024-05-27 12:13:10');
INSERT INTO `db_hrisapp`.`companies` (`companiescode`, `companies`, `created_at`, `updated_at`) VALUES ('BBM', 'PT Berdikasi Berkah Mulia', '2024-05-27 12:13:09', '2024-05-27 12:13:10');
INSERT INTO `db_hrisapp`.`companies` (`companiescode`, `companies`, `created_at`, `updated_at`) VALUES ('FAS', 'PT Farma Anugerah Sejati', '2024-05-27 12:13:09', '2024-05-27 12:13:10');
INSERT INTO `db_hrisapp`.`companies` (`companiescode`, `companies`, `created_at`, `updated_at`) VALUES ('CSP', 'PT Cipta Sarana Pangan', '2024-05-27 12:13:09', '2024-05-27 12:13:10');

INSERT INTO `db_hrisapp`.`departements` (`departementscode`, `departements`, `created_at`, `updated_at`) VALUES ('DEP0001', 'Marketing', '2024-05-27 12:15:28', '2024-05-27 12:15:29');
INSERT INTO `db_hrisapp`.`departements` (`departementscode`, `departements`, `created_at`, `updated_at`) VALUES ('DEP0002', 'Finance', '2024-05-27 12:15:28', '2024-05-27 12:15:29');
INSERT INTO `db_hrisapp`.`departements` (`departementscode`, `departements`, `created_at`, `updated_at`) VALUES ('DEP0003', 'Expedisi', '2024-05-27 12:15:28', '2024-05-27 12:15:29');
INSERT INTO `db_hrisapp`.`departements` (`departementscode`, `departements`, `created_at`, `updated_at`) VALUES ('DEP0004', 'Warehouse', '2024-05-27 12:15:28', '2024-05-27 12:15:29');

INSERT INTO `db_hrisapp`.`pendidikan` (`pendidikancode`, `pendidikan`, `created_at`, `updated_at`) VALUES ('PD0001', 'SD', '2024-05-27 12:16:33', '2024-05-27 12:16:33');
INSERT INTO `db_hrisapp`.`pendidikan` (`pendidikancode`, `pendidikan`, `created_at`, `updated_at`) VALUES ('PD0002', 'SMP', '2024-05-27 12:16:33', '2024-05-27 12:16:33');
INSERT INTO `db_hrisapp`.`pendidikan` (`pendidikancode`, `pendidikan`, `created_at`, `updated_at`) VALUES ('PD0003', 'SMA', '2024-05-27 12:16:33', '2024-05-27 12:16:33');
INSERT INTO `db_hrisapp`.`pendidikan` (`pendidikancode`, `pendidikan`, `created_at`, `updated_at`) VALUES ('PD0004', 'Strata I', '2024-05-27 12:16:33', '2024-05-27 12:16:33');
INSERT INTO `db_hrisapp`.`pendidikan` (`pendidikancode`, `pendidikan`, `created_at`, `updated_at`) VALUES ('PD0005', 'Strata II', '2024-05-27 12:16:33', '2024-05-27 12:16:33');

INSERT INTO `db_hrisapp`.`subdepartements` (`subdepartementscode`, `subdepartements`, `created_at`, `updated_at`) VALUES ('SDEP', 'Sales', '2024-05-27 12:18:41', '2024-05-27 12:18:42');

INSERT INTO `db_hrisapp`.`position` (`positioncode`, `position`, `created_at`, `updated_at`) VALUES ('JAB0001', 'Sales', '2024-05-27 12:19:50', '2024-05-27 12:19:50');
INSERT INTO `db_hrisapp`.`position` (`positioncode`, `position`, `created_at`, `updated_at`) VALUES ('JAB0002', 'Acounting', '2024-05-27 12:19:50', '2024-05-27 12:19:50');
INSERT INTO `db_hrisapp`.`position` (`positioncode`, `position`, `created_at`, `updated_at`) VALUES ('JAB0003', 'Pembelian', '2024-05-27 12:19:50', '2024-05-27 12:19:50');

INSERT INTO `db_hrisapp`.`religion` (`religioncode`, `religion`, `created_at`, `updated_at`) VALUES ('AG0001', 'Islam', '2024-05-27 12:21:54', '2024-05-27 12:21:55');
INSERT INTO `db_hrisapp`.`religion` (`religioncode`, `religion`, `created_at`, `updated_at`) VALUES ('AG0002', 'Kristen', '2024-05-27 12:21:54', '2024-05-27 12:21:55');
INSERT INTO `db_hrisapp`.`religion` (`religioncode`, `religion`, `created_at`, `updated_at`) VALUES ('AG0003', 'Katholik', '2024-05-27 12:21:54', '2024-05-27 12:21:55');
INSERT INTO `db_hrisapp`.`religion` (`religioncode`, `religion`, `created_at`, `updated_at`) VALUES ('AG0004', 'Budha', '2024-05-27 12:21:54', '2024-05-27 12:21:55');
INSERT INTO `db_hrisapp`.`religion` (`religioncode`, `religion`, `created_at`, `updated_at`) VALUES ('AG0005', 'Hindu', '2024-05-27 12:21:54', '2024-05-27 12:21:55');


INSERT INTO `db_hrisapp`.`statusnikah` (`statusnikahcode`, `statusnikah`, `created_at`, `updated_at`) VALUES ('BN0001', 'Belum Nikah', '2024-05-30 00:16:17', '2024-05-30 00:16:19');
INSERT INTO `db_hrisapp`.`statusnikah` (`statusnikahcode`, `statusnikah`, `created_at`, `updated_at`) VALUES ('BN0002', 'Nikah', '2024-05-30 00:16:17', '2024-05-30 00:16:19');