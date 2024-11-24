import json
import os
os.chdir(os.path.dirname(os.path.abspath(__file__)))

with open('./kinnisvara.json', 'r', encoding='utf-8') as f:
    data = json.load(f)

with open('kinnisvara.sql', 'w', encoding='utf-8') as f:
    for e in data:
        aadress = e["aadress"]
        hind = e["hind"]
        kv_id = e["kv_id"]
        pikk_url = e["pikk_url"]
        kuupaev = e["kuupaev"]
        m2 = e["m2"]
        m2eur = e["m2eur"]
        tube = e["tube"]
        obj_liik = e["obj_liik"]
        tekst = e["tekst"].replace("'", "''") 
        broneeritud = e["broneeritud"]
        
        f.write(
            f"INSERT INTO real_estate (aadress, hind, kv_id, pikk_url, kuupaev, m2, m2eur, tube, obj_liik, tekst, broneeritud) "
            f"VALUES ('{aadress}', '{hind}', '{kv_id}', '{pikk_url}', '{kuupaev}', '{m2}', '{m2eur}', '{tube}', '{obj_liik}', '{tekst}', '{broneeritud}');\n"
        )