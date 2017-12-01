set PGUSER=postgres
set PGPASSWORD=13232729

"C:/Program Files/PostgreSQL/9.6/bin\"pg_dump.exe --host localhost --port 5432 -U postgres --format custom --blobs --verbose --file "E:\backup_sistema\bkp_bdfarmacia.sql" "bdfarmacia"