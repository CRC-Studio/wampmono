@echo off
chcp 65001
setlocal

:: Aller dans le dossier du projet
cd /d "C:\wamp64\www\wampmono.lcl"

:: Récupérer les infos Git
for /f %%i in ('git rev-parse HEAD') do set COMMIT=%%i
for /f "delims=" %%j in ('git log -1 --pretty^=%%s') do set SUMMARY=%%j
for /f "delims=" %%k in ('git log -1 --date=iso-strict --pretty^=%%cd') do set DATE=%%k

:: Écrire dans le fichier VERSION.txt
(
  echo {
  echo   "SUMMARY": "%SUMMARY%",
  echo   "BUILD": "%DATE%",
  echo   "COMMIT": "%COMMIT%"
  echo }
) > VERSION

echo ✅ The VERSION file has been created successfully.
pause