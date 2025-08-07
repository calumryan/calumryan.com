#!/bin/bash

# Clear Kirby cache
echo "🧹 Clearing Kirby cache..."
rm -rf site/cache/*
echo "✅ Cache cleared."

# Scan for hardcoded IP references
echo "🔍 Scanning for legacy IP references..."
grep -r '161\.35\.65\.165' site/ > legacy-ip-refs.txt

if [ -s legacy-ip-refs.txt ]; then
  echo "⚠️ Found hardcoded IPs:"
  cat legacy-ip-refs.txt
else
  echo "✅ No hardcoded IPs found."
  rm legacy-ip-refs.txt
fi

# Optional: Restart web server
echo "🔁 Restarting web server..."
sudo sudo systemctl reload apache2
echo "✅ Done!"
