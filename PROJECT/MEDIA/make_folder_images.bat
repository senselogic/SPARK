call ..\define.bat
if not exist "..\www\static\image\%1" mkdir "..\www\static\image\%1"
for %%f in (static\image\%1\*.*) do ..\%TOOL%\REMIX\remix %6 ..\%TOOL%\IMAGE_MAGICK\convert "%%f" -background white -alpha remove -alpha off -resize %2@ -quality 70 -strip "..\www\static\image\%1\%%~nf.jpg"
for %%f in (static\image\%1\*.*) do ..\%TOOL%\REMIX\remix %6 ..\%TOOL%\IMAGE_MAGICK\convert "%%f" -background white -alpha remove -alpha off -resize %3@ -quality 70 -strip "..\www\static\image\%1\%%~nf.jpg.medium.jpg"
for %%f in (static\image\%1\*.*) do ..\%TOOL%\REMIX\remix %6 ..\%TOOL%\IMAGE_MAGICK\convert "%%f" -background white -alpha remove -alpha off -resize %4@ -quality 70 -strip "..\www\static\image\%1\%%~nf.jpg.small.jpg"
for %%f in (static\image\%1\*.*) do ..\%TOOL%\REMIX\remix %6 ..\%TOOL%\IMAGE_MAGICK\convert "%%f" -background white -alpha remove -alpha off -resize %5@ -quality 50 -strip "..\www\static\image\%1\%%~nf.jpg.preload.jpg"
