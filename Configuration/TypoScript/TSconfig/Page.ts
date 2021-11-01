mod.wizards.newContentElement.wizardItems.plugins {
	elements {
		moonteaser {
			iconIdentifier = ext-moonteaser-wizard-icon
			title = Seiten Teaser
			description = Teaser mit Bild, Titel, Text und Bild
			tt_content_defValues {
				CType = list
				list_type = moonteaser_pi1
			}
		}
	}

	show := addToList(moonteaser)
}

tx_moonteaser.templateLayouts {
	1 = Teaser (Bild mit Text / Titel / Teasertext)
	10 = Teaser (Bild mit Titel)
	20 = Teaser (nur Bild)
	30 = Teaser (nur Titel)
}