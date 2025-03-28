# Define the folder containing the .webp files
$folderPath = "C:\Users\felip\Desktop\Mind Room Innovation\Mind Room Courses\.Dev Tools\Images Optimization\script_for_png_images\output\" # Change this to the actual path of your folder

# Get all .webp files in the specified folder
$webpFiles = Get-ChildItem -Path $folderPath -Filter *.webp

# Loop through each .webp file
foreach ($file in $webpFiles) {
    # Get the base name (without extension)
    $baseName = [System.IO.Path]::GetFileNameWithoutExtension($file.Name)
    
    # Create the new name by appending "Thumbernail" to the base name
    $newName = $baseName + "Thumbernail.webp"
    
    # Define the full path of the new file name
    $newFilePath = Join-Path -Path $folderPath -ChildPath $newName
    
    # Rename the file
    Rename-Item -Path $file.FullName -NewName $newFilePath
}

# Output a message to indicate the operation is complete
Write-Host "All .webp files have been renamed."
