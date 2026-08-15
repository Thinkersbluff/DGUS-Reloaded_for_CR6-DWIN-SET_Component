
# DGUS-reloaded (for Klipper) DWIN_SET, CR6Community Edition

## PLEASE NOTE:
The goal of this project is to breathe new life into the CR6 stock TFT display, which would otherwise no longer function once Klipper is installed on your printer.
Installing just this firmware onto your display is NOT enough.  The activation and integration of this UI into your printer system relies totally upon you to also:  
    1. Install the latest Klipper + Mainsail on a host processor (e.g. Raspberry pi or Linux PC)  
    2. Flash the pre-compiled Klipper.bin file to your printer's motherboard.   
    3. Install the t5uid1 python application into the ~klipper/klippy/extras folder on your Klipper host processor  
    4. Install the Stable_Z_Home "plug-in" from  [https://github.com/matthewlloyd/Klipper-Stable-Z-Home](https://github.com/matthewlloyd/Klipper-Stable-Z-Home)  
    5. Install and tailor the Mainsail .cfg files provided in the Related Changes folder of the linked repository  
    6. Tailor your slicer (instructions are only provided for Cura and OrcaSlicer) to include M73 messages in the gcode files  

I have configured my own CR6-SE printer with KlipperScreen on a 7" tablet at the printer and Mainsail on a laptop beside the printer, but there are still some operations for which I prefer to use my stock display with this firmware.  

I am maintaining these two repositories in the hope that some of you will also enjoy some features of both this DWIN_SET application and my customizations of Klipper.  
I recommend that you start with installing and configuring MainsailOS and Klipper on your printer, and then return to flash your stock display if you - like I - enjoy some of these features.  

To help tease you into trying this firmware, here is a sampling of some of the screens I use most often:  

<img src="https://github.com/user-attachments/assets/144ecea5-29f6-4cd5-9fdc-55c23dc6611a" alt="Home Screen" width="180" height="320">
<img src="https://github.com/user-attachments/assets/6b18f104-7bdf-492c-8975-a885a7761071" alt="ZOffset Screen" width="180" height="320">
<img src="https://github.com/user-attachments/assets/c6550ada-fdc4-4077-8f4c-10b3181b8d9c" alt="ABL Screen" width="180" height="320">
<img src="https://github.com/user-attachments/assets/1a2df1ad-7fd8-4d04-8f1c-f8648cd6a2e3" alt="PID Tuning Screen" width="180" height="320">
<img src="https://github.com/user-attachments/assets/3270ed36-0c93-4227-9662-c32ef38e7aac" alt="Rotation Distance Screen" width="180" height="320">

<img src="https://github.com/user-attachments/assets/1d66360d-592c-44f6-9bf9-efef93a1ee99" alt="Change Filament Screen" width="180" height="320">
<img src="https://github.com/user-attachments/assets/db0d69ef-4aed-4c9e-a14e-5bc9a6552759" alt="Print Menu Screen" width="180" height="320">
<img src="https://github.com/user-attachments/assets/230409ca-0283-4bb7-9a21-47ee9d57f15e" alt="Print Macros Screen" width="180" height="320">
<img src="https://github.com/user-attachments/assets/1914bae2-530c-4f68-b5c1-ce0846d0ffaf" alt="Print Status Screen" width="180" height="320">

This DWIN touchscreen firmware is designed and compiled to run on the portrait-mode T5L 272x480 pixel DWIN displays provided stock with Creality CR6-SE and CR6-MAX FDM printers.

Initially refactored and extended from the T5UID1 DGUS-reloaded firmware by Desuuuu which is available from [this repository](https://github.com/Desuuuu/DGUS-reloaded-Klipper).  

At release 0.3, completely refactored again, to closely resemble the [CF6.1 Community Firmware](https://github.com/CR6Community/CR-6-touchscreen) in look, feel, terminology, and workflow logic.

## Disclaimer
**This software is provided without any warranty. You are solely responsible for your use of it.**

## Features
This firmware was inspired by the CR6Community Firmware touchscreen firmware, but it is NOT a feature-for-feature duplicate of that interface. 

Features present in version 2.0.3 of the UI include:
* Support for _most_ workflows best performed standing at the printer 
* Emergency Stop (M112) button on every screen
* Ability to Tune some printer settings during a print
* PID autotuning for both Nozzle and for Bed, with SAVE_CONFIG option
* User-specifiable Material heat settings for up to three filaments (e.g: PLA, PETG and ABS)
* Screen Display Brightness adjustment
* Pause/Resume/Cancel print controls
* Display elapsed time since starting current print
* Support for M73 message (% complete, time remaining) display during printing
* SET_GCODE_OFFSET Z for current print session
* Support for manual leveling, for those who have retrofit bed wheels
* Run 5x5 ABL with option to SAVE_CONFIG (default) Profile
* Full scroll/select/print capability for all .gcode files on the Virtual SD Card.
* Displays name of file currently being printed
* Enable|Disable Runout Sensor
* Enable|Disable Automatic Unload of filament at print completion
* Printer halts and prompts for filament, if Runout Sensor is Enabled AND Filament is not detected
* Z Offset calibration screen
* Custom Macros capability, with a user-definable set of menus accessed through a button on the top bar of selected menus.
* Supports Firmware Retraction
* Colour-codes the displayed bed_mesh points, with a user-specifiable threshold for what min/max values are low enough to code as "green". * User can Calibrate Extruder Rotation_Distance (Klipper equivalent to Marlin's e-steps)

****************************************************************************************************************************************
>> **CAUTION:** The automatic bed-leveling function provided with this firmware ONLY works correctly if you also configure your printer.cfg to perform a 5x5 bed mesh.  If you do not want to use a 5x5 mesh, do not use this ABL function.
****************************************************************************************************

## Compatibility
This firmware **should** be compatible with any configuration of CR6-SE or CR6-MAX printer, regardless of whether that machine is fully stock or substantially modified. (It even includes a manual leveling screen, for those of you who have installed manual bed-leveling wheels.)
Some configuration differences between the developer's modified SE and your printer require you to tailor the Klipper configuration files for your printer (guidance is included as comments in those files)

Testing is done on the following machine:

* Creality CR6-SE, modified with:
    - a BTT SKR CR6 v1.0 motherboard
    - a direct drive Orbiter v1.5 extruder with Moons pancake motor
    - a Dragon HF hotend
    - 0.9 deg Y-Axis motor
    - 0.9 deg X-Axis motor 
    - a PEI flexible magnetic sheet print bed
    - silicone spacers under the bed, replacing the stock plastic standoffs
    - gantry braces
    - bed converted to use linear rails
    - BTT SFS 1.0 filament motion sensor
    - Bambu nozzle cleaning brush mounted to the bed

## Prerequisites
For this DWIN_SET to work with your printer, you must also:
- Install the latest version of MainsailOS
- Tailor your Klipper installation, MainsailOS configuration and slicer
- Flash the applicable pre-compiled Klipper.bin file provided for you in the Klipper Component repo.
- Install Pi-Side scripts and other 3rd-party helpers (e.g. gcode_shell_command.py and Stable_Z_Home), per the Installation Manual in the Klipper Component repo.

[All of the instructions for achieving the above are provided as Installation Documentation, with the matching Klipper component release, here.](https://github.com/Thinkersbluff/dgus-reloaded_klipper)

## How to Customize the UI Look and Feel
You can make modifications to the DWIN_SET firmware by opening the `DWprj.hmi` file in **DGUS Tools**.  The tool, developer's documents and Tutorial URLs have been added to the repository at this release, to help anyone who would like to learn how this is done.

You can edit the graphics using a simple bitmap editing tool, like Windows PAINT.

After finishing your modifications, you will need to press the *Generate* command from the DGUSTool File menu to update the 3 required binary files (13TouchFile.bin, 14ShowFile.bin and 22_Config.bin) in the DWIN_SET folder.
If you modified any of the screen layouts, icons or buttons, you will also need to use the ICL tool to regenerate the applicable ICL file(s) (intuitively named: 24_icons.icl, 27_buttons.icl, 32_screens.icl, 30_progress_left.icl and 37_progress_right.icl).

You can then flash your touchscreen using the resulting `DWIN_SET` folder.

## Functional Changes Also Require Edits To Modified Klipper Files
Please note, that to actually add/delete/modify functionality, you will also need to make the necessary changes to the applicable modified Klipper files.

If you add any data variable display widgets to any of the screens, you also need to edit the DGUS-reloaded Klipper file pages.cfg in ~/klipper/klippy/extras/t5uid1/dgus-reloaded, so that the data will be refreshed and maintained when that screen is being displayed.

If you wish to modify the nozzle and bed temperature presets for PLA, ABS and/or PETG, you will need to modify the file _init_.py in the folder ~/klipper/klippy/extras/t5uid1/dgus-reloaded, so that the program will initialize those variables with the values of your choosing.

## Additional background info is available in the Desuuuu/DGUS-reloaded-Klipper-config Wiki
* [Flashing the firmware](https://github.com/Desuuuu/DGUS-reloaded-Klipper/wiki/Flashing-the-firmware)
* [Print status](https://github.com/Desuuuu/DGUS-reloaded-Klipper/wiki/Print-status)
* [Print progress display](https://github.com/Desuuuu/DGUS-reloaded-Klipper/wiki/Print-progress-display)

## How to Contribute

CR6Community Firmware features NOT present in this release may be developed in future releases, but no schedule commitment is possible for such extensions.  Users who are able to define and develop such modifications are welcome to fork this repository and to submit Pull Requests or to open Discussions or Issues as appropriate, to propose those changes.

## Credits
| Material                                                                       | Author                                                    | Modified | License                                                               |
|:------------------------------------------------------------------------------:|:---------------------------------------------------------:|:--------:|:---------------------------------------------------------------------:|
| [DGUS-RELOADED DWIN UI](https://github.com/Desuuuu/DGUS-reloaded-Klipper)      | [Desuuuu](https://github.com/Desuuuu)                     | Yes      | [GPLv3](http://www.gnu.org/licenses/gpl-3.0.html)   
| [Klipper logo](https://github.com/KevinOConnor/klipper)                        | [KevinOConnor](https://github.com/KevinOConnor)           | Yes      | [GPLv3](http://www.gnu.org/licenses/gpl-3.0.html)                     |
| [Feather icons](https://feathericons.com/)                                     | [Cole Bemis](https://twitter.com/colebemis)               | Yes      | [MIT](https://github.com/feathericons/feather/blob/master/LICENSE)    |
| [3D Printing Line icons](https://www.iconfinder.com/iconsets/3d-printing-line) | [Sam Baines](https://www.iconfinder.com/conceptbaines)    | Yes      | [CC-BY 3.0](https://creativecommons.org/licenses/by/3.0/legalcode)    |
| [Fan icon](https://thenounproject.com/term/fan/1153915/)                       | [Atif Arshad](https://thenounproject.com/atifarshad/)     | Yes      | [CC-BY 3.0](https://creativecommons.org/licenses/by/3.0/us/legalcode) |
| [Snow icon](https://thenounproject.com/term/snow/1959859/)                     | [Shashank Singh](https://thenounproject.com/rshashank19/) | Yes      | [CC-BY 3.0](https://creativecommons.org/licenses/by/3.0/us/legalcode) |
| [Electric Motor icon](https://thenounproject.com/term/electric-motor/2734486/) | [Verry](https://thenounproject.com/verry.dsign.creative)  | Yes      | [CC-BY 3.0](https://creativecommons.org/licenses/by/3.0/us/legalcode) |
| [Probe icon](https://thenounproject.com/term/probe/1841345/)                   | [Mohamed Mbarki](https://thenounproject.com/mb.icons)     | Yes      | [CC-BY 3.0](https://creativecommons.org/licenses/by/3.0/us/legalcode) |
| [Wheel icon](https://thenounproject.com/term/wheel/92430/)                     | [Deivid Sáenz](https://thenounproject.com/deivid.saenz)   | Yes      | [CC-BY 3.0](https://creativecommons.org/licenses/by/3.0/us/legalcode) |
| [Ruler icon](https://thenounproject.com/term/ruler/1738925/)                   | [Three Six Five](https://thenounproject.com/365)          | -        | [CC-BY 3.0](https://creativecommons.org/licenses/by/3.0/us/legalcode) |
| [Wrench icon](https://www.flaticon.com/free-icons/preferences)                | [Freepik - Flaticon](https://www.flaticon.com)            | Yes      | [Free-Use](https://www.freepikcompany.com/legal?&_ga=2.208290896.334573684.1672634783-793280358.1672634783&_gl=1*bcixj4*fp_ga*NzkzMjgwMzU4LjE2NzI2MzQ3ODM.*fp_ga_1ZY8468CQB*MTY3MjYzNDc4My4xLjEuMTY3MjYzNDgzMC4xMy4wLjA.*test_ga*NzkzMjgwMzU4LjE2NzI2MzQ3ODM.*test_ga_523JXC6VL7*MTY3MjYzNDc4My4xLjEuMTY3MjYzNDgzMS4xMi4wLjA.#nav-flaticon-agreement) |
Emergency Stop icon copied from [KlipperScreen](https://github.com/jordanruthe/KlipperScreen) | [Jordan Ruthe](https://github.com/jordanruthe)  | Yes        | [CC-BY 3.0](https://creativecommons.org/licenses/by/3.0/us/legalcode) |

## License
[GPLv3](http://www.gnu.org/licenses/gpl-3.0.html)
