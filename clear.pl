print("\n\nSuppression du cache ...");
system("sudo rm -rf ./app/cache/* ./app/logs/*");
system("sleep 0.1");
print("\n\nAttribution des droits ...");
system("sudo chmod 777 ./app/cache ./app/logs");
print("\n\nTerminé\n\n");
