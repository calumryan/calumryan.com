# Kirby 5 Micropublisher

A lightweight Micropub endpoint for Kirby CMS version 5>.

## Features
- OwnYourSwarm check-ins
- Notes
- Auto-prefixed check-in titles & content
- Published date from Micropub payload
- IndieAuth-compatible bearer auth
- Brid.gy syndication
- Latitude / longitude extraction
- No config required

## Install
Unzip into:
site/plugins/kirby-micropub-pro

## Endpoint
POST /micropub

## Required pages
- /notes
- /checkins

## Required templates
- note.php
- checkin.php
