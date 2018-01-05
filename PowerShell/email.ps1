##############################################################################
## Script: email.ps1
## Send SMTP Email from Powershell command.
## Config Variables can be set directly below, or
## by loading a config file in the calling script.

##############################################################################
## $From = "auth-email@domain.com"
## $Pass = "auth-password"
## $To = "to-email@domain.com"
## ## $Cc = "YourBoss@YourDomain.com"
## $Attachment = "file.ext"
## $Subject = "Example Subject Text"
## $Body = "Body String for Email"
## $SMTPServer = "smtp.server.com"
## $SMTPPort = "587"

## Variables found in config.bat
## This script called by backup.bat
## Backup.bat also calls config.bat which loads the following into Variables
## $From =         $env:From
## $Pass =         $env:Pass
## $To =           $env:To
## $Attachment =   $env:Attachment
## $Subject =      $env:Subject
## $Body =         $env:Body
## $SMTPServer =   $env:SMTPServer
## $SMTPPort =     $env:SMTPPort

$credentials = new-object Management.Automation.PSCredential $From, ( $Pass | ConvertTo-SecureString -AsPlainText -Force)
Send-MailMessage -From $From -to $To -Subject $Subject `
-Body $Body -SmtpServer $SMTPServer -port $SMTPPort -UseSsl `
-Credential $credentials -Attachments $Attachment

##############################################################################

## Prompt for output to hold prompt open
## useful while debugging .
## Read-Host -Prompt "Press Enter to exit"