INSERT INTO ft_table(login, groupe, date_de_creation) SELECT nom,'other', date_naissance FROM fiche_personne where LENGTH(nom) <= 8 AND nom  LIKE '%a%'  ORDER BY nom ASC LIMIT 10;
