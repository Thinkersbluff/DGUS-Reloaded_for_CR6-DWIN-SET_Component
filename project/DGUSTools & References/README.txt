The tool <Get-DwinSectorAllocation.ps1> is a Powershell script which verifies that the .bin and .icl files defined in DWIN_SET all fit into their respective memory slots, with no overlaps and nothing "out of bounds".

To run this script:
Copy the script to the folder containing the folder DWIN_SET
Run the script in Powershell
Answer the $Folderpath prompt with DWIN_SET and hit Enter

The script displays a graphic representing the allocation of memory space to each file.  Detected errors are flagged for correction.


CREDIT: The original script was obtained from https://github.com/CR6Community/CR-6-touchscreen/blob/extui/scripts/Get-DwinSectorAllocation.ps1 on 21 Jan 2023

NOTE: Powershell identified one syntax error in the original script, which has been fixed in this version.