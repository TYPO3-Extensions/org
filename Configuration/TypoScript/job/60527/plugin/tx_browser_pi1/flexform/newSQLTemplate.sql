SELECT week( curdate( ) ) , curdate( )

# Jobangebote dieses Monats
SELECT CONCAT( year( curdate( ) ), '-', month( curdate( ) ), '-01'), curdate( )

SELECT CONCAT(year( curdate( ) ), '-', month( curdate( ) ), '-01'), STR_TO_DATE(CONCAT(year( curdate( ) ), '-', month( curdate( ) ), '-01'),'%Y-%m-%d');



SELECT CONCAT(year( curdate( ) ), '-', week( curdate( ), 7 )), STR_TO_DATE(CONCAT(year( curdate( ) ), '-', week( curdate( ), 7 )),'%Y-%v');

SELECT DATE_ADD('2014-01-01', INTERVAL 29 WEEKS);

SELECT '2014-01-01' +INTERVAL week( curdate( ), 7 ) WEEK -INTERVAL WEEKDAY('2014-01-01' +INTERVAL week( curdate( ), 7 ) WEEK) DAY;


# Jobangebote seit Wochenbeginn
AND tx_org_job.tstamp >= UNIX_TIMESTAMP( curdate( ) -INTERVAL WEEKDAY( curdate( )) DAY )
# Jobangebote seit Wochenbeginn vor einer Woche
AND tx_org_job.tstamp >= UNIX_TIMESTAMP( curdate( ) -INTERVAL WEEKDAY( curdate( )) DAY - INTERVAL 1 WEEK )
# Jobangebote seit Wochenbeginn vor zwei Wochen
AND tx_org_job.tstamp >= UNIX_TIMESTAMP( curdate( ) -INTERVAL WEEKDAY( curdate( )) DAY - INTERVAL 2 WEEK )
# Jobangebote seit Wochenbeginn vor drei Wochen
AND tx_org_job.tstamp >= UNIX_TIMESTAMP( curdate( ) -INTERVAL WEEKDAY( curdate( )) DAY - INTERVAL 3 WEEK )
# Jobangebote seit Wochenbeginn vor vier Wochen
AND tx_org_job.tstamp >= UNIX_TIMESTAMP( curdate( ) -INTERVAL WEEKDAY( curdate( )) DAY - INTERVAL 4 WEEK )

# Jobangebote seit Monatsbeginn
AND tx_org_job.tstamp >= UNIX_TIMESTAMP( CONCAT( year( curdate( ) ), '-', month( curdate( ) ), '-01') )
# Jobangebote seit Monatsbeginn vor einem Monat
AND tx_org_job.tstamp >= UNIX_TIMESTAMP( CONCAT( year( curdate( ) ), '-', month( curdate( ) ), '-01') - INTERVAL 1 MONTH )
# Jobangebote seit Monatsbeginn vor zwei Monaten
AND tx_org_job.tstamp >= UNIX_TIMESTAMP( CONCAT( year( curdate( ) ), '-', month( curdate( ) ), '-01') - INTERVAL 2 MONTH )
# Jobangebote seit Monatsbeginn vor drei Monaten
AND tx_org_job.tstamp >= UNIX_TIMESTAMP( CONCAT( year( curdate( ) ), '-', month( curdate( ) ), '-01') - INTERVAL 3 MONTH )

# Jobangebote seit Quartalsbeginn
AND tx_org_job.tstamp >= UNIX_TIMESTAMP( CONCAT( year( curdate( ) ), '-', ((QUARTER( curdate())  -1 )* 3) + 1, '-01') )
# Jobangebote seit Quartalsbeginn vor einem Quartal
AND tx_org_job.tstamp >= UNIX_TIMESTAMP( CONCAT( year( curdate( ) ), '-', ((QUARTER( curdate())  -1 )* 3) + 1, '-01') - INTERVAL 1 QUARTER )
# Jobangebote seit Quartalsbeginn vor zwei Quartalen
AND tx_org_job.tstamp >= UNIX_TIMESTAMP( CONCAT( year( curdate( ) ), '-', ((QUARTER( curdate())  -1 )* 3) + 1, '-01') - INTERVAL 2 QUARTER )
# Jobangebote seit Quartalsbeginn vor drei Quartalen
AND tx_org_job.tstamp >= UNIX_TIMESTAMP( CONCAT( year( curdate( ) ), '-', ((QUARTER( curdate())  -1 )* 3) + 1, '-01') - INTERVAL 3 QUARTER )

# Jobangebote seit Jahresbeginn
AND tx_org_job.tstamp >= UNIX_TIMESTAMP( CONCAT( year( curdate( ) ), '-01-01') )
# Jobangebote seit Jahresbeginn vor einem Jahr
AND tx_org_job.tstamp >= UNIX_TIMESTAMP( CONCAT( year( curdate( ) ), '-01-01') - INTERVAL 1 YEAR )
# Jobangebote seit Jahresbeginn vor zwei Jahren
AND tx_org_job.tstamp >= UNIX_TIMESTAMP( CONCAT( year( curdate( ) ), '-01-01') - INTERVAL 2 YEAR )
# Jobangebote seit Jahresbeginn vor drei Jahren
AND tx_org_job.tstamp >= UNIX_TIMESTAMP( CONCAT( year( curdate( ) ), '-01-01') - INTERVAL 3 YEAR )


