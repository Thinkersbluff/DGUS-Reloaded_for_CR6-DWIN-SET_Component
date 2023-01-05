This folder contains all of the files required to use the Desuuuu DGUS-Reloaded system on a CR6-SE printer.


	The DWIN_SET folder can be flashed to the display, as-is.  That will upload the TFT UI to the DWIN display.

	Copy the file klipper_repos.txt to ./kiauh/ (after installing kiauh and before trying to install klipper), to enable kiauh to select the modified klipper repo as the klipper source.  Then change the klipper repo in Kiauh to the  option.

	Use KIAUH (https://github.com/th33xitus/kiauh) to install Klipper from the Thinkersbluff/dgus-reloaded_klipper repository, DGUS-ReloadedForCR6 branch.

AFTER installing  DGUS-reloaded Klipper, from the DGUS-ReloadedForCR6 branch of this repo: https://github.com/Thinkersbluff/dgus-reloaded_klipper:

	1. Install the STABLE_Z_HOME extension, per the instructions at https://github.com/matthewlloyd/Klipper-Stable-Z-Home

	2. If you have a BTT SKR CR6 motherboard in your printer, flash (to that motherboard) the firmware.bin file located in the folder "Related System Changes\Flash this firmware.bin file if you have a BTT SKR CR6 v1.0 motherboard"

	   If you do not have a BTT SKR CR6 V1.0 motherboard:
		Use the modified Klipper to make menuconfig and then make a new Klipper.bin file for the motherboard in your printer.
		Download that klipper.bin file, rename it to firmware.bin (for BTT SKR CR6 board) or DesuuuuKlipper.bin (for Creality boards).

	   REMEMBER: If you need to flash the motherboard more than once:
		- The file must always be named firmware.bin, for the BTT board
		- The file must be named something new, each time, for the Creality boards.

	3. Edit your Printer.cfg file, per your particular printer motherboard and Klipper configuration requirements.

	4. Either Include t5uid1.cfg or paste the contents into printer.cfg to create a [t5uid1] section.  Edit those settings to your taste.

	5. Consider modifying your slicer of choice, to embed M117 messages in the gcode, to report current layer # vs max layer # and Time remaining on the printing status page, when printing.


Known Issues with this version:

https://github.com/Desuuuu/klipper/issues/135
 - Enable/Disable Steppers is not working

https://github.com/Desuuuu/klipper/issues/134
 - First Homing after power-up causes SHUTDOWN  

https://github.com/Desuuuu/klipper/issues/136
 - "Abort Print" does not also park the head.

https://github.com/Desuuuu/klipper/issues/137
 - No support for M112 Emergency Shutdown from the UI

