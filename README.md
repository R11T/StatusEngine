# Status Engine
## Description

This script aims to be used in a status page service. It only stores data about statuses of servers like MySQL, HTTP or NFS ; it's up to you to do a script that gives a meaning to probes results in your specific case.

## Installation

1 / Set as many probes as you want (See `Config/config.json.example` file).

2 / Add Status Engine in your crontab with any period (more than 5 minutes is useless though) with `start` option.

3 / Use your probes' data stored in `Data/result.json` file.

4 / Enjoy !

## Contribute

Every little hands are welcome obviously, whether it's for correcting a bug or adding an analyzable probe.

## License

Status Engine is under GPL-v2 license, see LICENSE file for details.
