#!/usr/bin/env bash

# Specify where we will install
# the xip.io certificate
SSL_DIR="/Users/moove/Sites/localSSL"

# Set the wildcarded domain
# we want to use
DOMAIN="*.zoojoobe.dev"

KEYNAME="zoojoobe.dev"

# A blank passphrase
PASSPHRASE=""

# Set our CSR variables
SUBJ="
C=IN
ST=Karnataka
O=
localityName=Bangalore
commonName=$DOMAIN
organizationalUnitName=
emailAddress=
"

# Create our SSL directory
# in case it doesn't exist
sudo mkdir -p "$SSL_DIR"

# Generate our Private Key, CSR and Certificate
sudo openssl genrsa -out "$SSL_DIR/$KEYNAME.key" 2048
sudo openssl req -new -subj "$(echo -n "$SUBJ" | tr "\n" "/")" -key "$SSL_DIR/$KEYNAME.key" -out "$SSL_DIR/$KEYNAME.csr" -passin pass:$PASSPHRASE
sudo openssl x509 -req -days 365 -in "$SSL_DIR/$KEYNAME.csr" -signkey "$SSL_DIR/$KEYNAME.key" -out "$SSL_DIR/$KEYNAME.crt"