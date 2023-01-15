
# DGUS-reloaded (for Klipper) DWIN_SET, CR6Community Edition

This DWIN touchscreen firmware is designed and compiled to run on the portrait-mode T5L 272x480 pixel DWIN displays provided stock with Creality CR6-SE and CR6-MAX FDM printers.

Initially refactored and extended from the T5UID1 DGUS-reloaded firmware by Desuuuu which is available from [this repository](https://github.com/Desuuuu/DGUS-reloaded-Klipper).  

At release 0.3, completely refactored again, to closely resemble the [CF6.1 Community Firmware](https://github.com/CR6Community/CR-6-touchscreen) in look, feel, terminology, and workflow logic.

## Disclaimer
**This software is provided without any warranty. You are solely responsible for your use of it.**

## Features

This firmware was inspired by the CR6Community Firmware touchscreen firmware, but it is NOT as feature-rich as the CR6Community Firmware. 

Features present in this version of the UI include:
* Status message available on most screens
* Z offset, manual and automatic leveling
* PID autotuning for Nozzle and for Bed
* Display Brightness adjustment
- A printing status page, with a Tuning menu and Pause/Resume/Cancel print controls 

## How to Contribute

CR6Community Firmware features NOT present in this release may be developed in future releases, but no schedule commitment is possible for such extensions.  Users who are able to define and develop such modifications are welcome to fork this repository and to submit Pull Requests or to open Discussions or Issues as appropriate, to propose those changes.

## Compatibility
This firmware is intended to work on any CR6-SE or CR6-MAX, regardless of whether that machine is fully stock or substantially modified. (It even includes a manual leveling screen, for those of you who have installed manual bed-leveling wheels.)

This firmware **should** be compatible with any configuration of CR6-SE or CR6-MAX printer.
**CAUTION:** The automatic bed-leveling function provided with this version of the firmware ONLY works if you configure your printer.cfg to perform a 5x5 bed mesh.  If you do not want to use a 5x5 mesh, do not use this ABL function.

Testing is done on the following machine:

* Creality CR6-SE, modified with:
    - a Creality ERA 1.1.0.3 motherboard
    - a direct drive Orbiter v1.5 extruder with Moons pancake motor
    - a Dragon HF hotend
    - a 0.9 deg Y axis motor
    - a PEI flexible magnetic sheet

## Prerequisites
For this DWIN_SET to work with your printer, you must also:
- install this [modified version of Klipper](https://github.com/Thinkersbluff/dgus-reloaded_klipper)
- use Make Menuconfig, Make to build a custom Klipper.bin file for flashing to your motherboard
  (Make sure to enable the serial connection to the screen while using Menuconfig to configure the MCU firmware.)

Each new version of this UI and of the modified Klipper is always released as a matched pair. Each points to the other, in the release notes.

To enable the UART interface between the display and motherboard (MCU), you must at least add this section to your printer.cfg:

[t5uid1]
firmware: dgus_reloaded

For a complete list of all available options in the [t5uid1] section, see the [sample-t5uid1.cfg](https://github.com/Desuuuu/klipper/blob/master/config/sample-t5uid1.cfg) file.

Example Klipper configurations are available in [the Desuuuu/DGUS-reloaded-Klipper-config repository](https://github.com/Desuuuu/DGUS-reloaded-Klipper-config).

## Additional help is available in the Desuuuu/DGUS-reloaded-Klipper-config Wiki
* [Flashing the firmware](https://github.com/Desuuuu/DGUS-reloaded-Klipper/wiki/Flashing-the-firmware)
* [Print status](https://github.com/Desuuuu/DGUS-reloaded-Klipper/wiki/Print-status)
* [Print progress display](https://github.com/Desuuuu/DGUS-reloaded-Klipper/wiki/Print-progress-display)

## How to Customize the UI Look and Feel
You can make modifications to the DWIN_SET firmware by opening the `DWprj.hmi` file in **DGUS Tools**.  Two versions of that tool, documents and Tutorial URLs have been added to the repository at this release, to help anyone who would like to learn how this is done.

You can edit the graphics using a simple bitmap editing tool, like Windows PAINT.

After finishing your modifications, you will need to press the *Generate* command from the DGUSTool File menu to update the 3 required binary files (13TouchFile.bin, 14ShowFile.bin and 22_Config.bin) in the DWIN_SET folder.
If you modified any of the screen layouts, icons or buttons, you will also need to use the ICL tool to regenerate the applicable ICL file(s) (intuitively named: 24_icons.icl, 27_buttons.icl, 32_screens.icl, 30_progress_left.icl and 37_progress_right.icl).

You can then flash your touchscreen using the resulting `DWIN_SET` folder.

## Functional Changes Also Require Edits To Modified Klipper Files
Please note, that to actually add/delete/modify functionality, you will also need to make the necessary changes to the applicable modified Klipper files.

If you add any data variable display widgets to any of the screens, you also need to edit the DGUS-reloaded Klipper file pages.cfg in ~/klipper/klippy/extras/t5uid1/dgus-reloaded, so that the data will be refreshed and maintained when that screen is being displayed.
I have included that modified file for this distribution, for you to overwrite the stock (Desuuuu) pages.cfg when you install this CR6 version of the UI.

If you wish to modify the nozzle and bed temperature presets for PLA, ABS and/or PETG, you will need to modify the file _init_.py in the folder ~/klipper/klippy/extras/t5uid1/dgus-reloaded, so that the program will initialize those variables with the values of your choosing.
I have included that modified file for this distribution, for you to overwrite the stock (Desuuuu) _init_.py when you install this CR6 version of the UI. (CAUTION: There is more than one file named  _init_.py in the t5uid1 application. Be sure you are in the right directory when overwriting the stock one with the modified one.)

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
