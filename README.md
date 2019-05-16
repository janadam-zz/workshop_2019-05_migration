# Migrace z databáze neznámých systémů
Drupal CS Camp workshop

Lektor: Martin Klíma, martin.klima@hqis.cz

Drupal profil: https://www.drupal.org/u/martin_klima


## Co je dobré mít, než začneme
- Mít nainstalované Lando, pokud nemáte, zde jsou instrukce: https://docs.devwithlando.io/installation/system-requirements.html
- Mít nějaký programátorský editor pro psaní kódu
- Nějaký nástroj na práci s databázemi, např. MySQL Workbench https://www.mysql.com/products/workbench/

## Co udělat před workshopem

- Stáhout nebo naklonovat projekt z tohoto repozitáře do pracovního adresáře
- Být v tomto adresáři
- Spustit vývojové prostředí

      lando start

- Nainstalovat všechny potřebné soubory

      lando composer install
      
- Vytvořit setting.php z připraveného souboru

      cp web/sites/workshop.settings.php web/sites/default/settings.php       

- Nainstalovat Drupal

      lando drush si minimal --existing-config
      
- Změnit si heslo pro Admina, např. na "admin"

      lando drush upwd admin admin
      
- Zkusit, jestli Drupal frčí

      http://migration.localhost
      http://migration.lndo.site
      
     případně použijte příkaz:
     
      lando info -s appserver
     a tam najdete URL k projektu.
     
     
## Co udělat dále, klidně až na workshopu

- Naimportovat zdrojovou databázi pro migraci

      lando db-import -h database_source _sql/source.sql    