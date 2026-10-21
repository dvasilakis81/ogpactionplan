# Action Plan (mod_action_plan)

A Joomla site module that presents an action plan as a set of items, each with milestones, a colour-coded progress bar, dates, a status and expandable results. It is designed for public-sector and open-government websites that report progress on their commitments.

## Features

- Action-plan items with a subject and an optional link
- Milestones with start and end dates, a status and rich-text results
- Colour-coded progress bar and expandable milestone and results panels
- Five statuses: Started, In Progress, Cancelled, Completed, Incomplete
- English (en-GB) and Greek (el-GR) included
- Keyboard and screen-reader accessible
- Supports multiple instances on the same page
- Layout split into overridable parts for template overrides

## Requirements

- Joomla 4.x, 5.x or 6.x
- PHP 7.4 or later

## Installation

1. Download the latest package from [Releases](../../releases).
2. In the Joomla administrator, go to **System → Install → Extensions** and upload the package.
3. Go to **Content → Site Modules → New** and select **Action Plan**.
4. Add your items and milestones, assign the module to a position and menu items, and save.

To update, install the newer package over the existing one. Your content is kept.

## Template overrides

To customise the output, copy any of the `tmpl/default*.php` files to `templates/<your_template>/html/mod_action_plan/` and edit the copy. You can also use Joomla's **Create Overrides** tool in the site template settings.

## License and Disclaimer

This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version. This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

We do not offer any kind of support. Using freely distributed software does not entitle you to free support or labor from its developers. You may contact us with any ideas for new features, but there are no guarantees that your request will be implemented or ever responded to in a certain timeframe or at all.
