# Þema fyrir undirsíður Árborgar

Stílar og þema sem byggir á núverandi útliti arborg.is

## Inngangur

Þemað er keyrt sem viðbót af Astra þema þannig munu þeir sjá um allar helstu uppfærslur hjá wordpress

### Forkröfur

Áður en þemað er sett upp þarf að vera búið að hlaða inn Astra þema á vefsíðuna. Það er hægt að nálgast hér https://wpastra.com/

### Uppsetning

Vefsíðan er tengd við Git í gegnum plesk.
1. Opna Plesk og skrá sig inn.
2. Finna vefsíðuna undir "Websites & Domains".
3. Opna "File Manager" undir "Files & Databases".
4. Búa til nýja möppu inní "{vefsíða}/wp-content/themes sem heitir" "arborg-theme".
5. Finna vefsíðuna undir "Websites & Domains".
6. Opna "Git" undir "Dev Tools".
7. Límia "https://github.com/arborgwebadmin/arborg_theme.git" undir "Remote Git repository" OG velja "{vefsíða}/wp_content/themes/arborg-theme" sem "to" áfangastað. (passa að rétt síða sé valin, stundum þarf að opna hana undir files til að hún birtist í brows glugganum). Velja "OK".
8.  Opna "Repository settings" og afrita slóðina fyrir "Webhook URL".
9. "https://github.com/arborgwebadmin/arborg_theme/settings/hooks/new" fara inná þessa slóð (þarf að vera skráður inn) og líma "Webhook URL" slóðina í "Payload URL". Velja "Add webhook".
10. Fara aftur inná plesk opna "File Manager" (skref 2 og 3)
11. Opna möppuna með þemanu "{vefsíða}/wp-content/theme/arborg-theme/".
12. Velja "New" -> "Create File"
13. "File name" = "colorStyle.css"
14. Líma:
  ```
  :root{
      --color1: ;
      --color1Fade: ;
      --color2: ;
      --color2Fade: ;
      --color3: ;
      --color3Fade: ;
      --color4: ;
      --color4Fade: ;
  }
  ```
  Einnig (hægt að finna undir colorStyleTemplate.css)
15. Fylla inn með viðeigandi litum (color*Fade er rgba litur með a gildi sem 0.2)(hægt að hafa færri liti með að setja sama litinn aftur) og velja "OK"
16. Fara inná wordpress sem kerfisstjóri og breyta þemanu í "skolasidur-arborg".

## Höfundur

* **Hólmfríður Magnea Hákonardóttir**
