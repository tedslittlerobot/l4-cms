VENDOR=tlr
PACKAGE=l4-cms

install: clean styles
	@composer install

test:
	@phpunit

clean-test:
	@rm -rf report

coverage:
	@phpunit --coverage-html ./report

report: coverage
	@open ./report/index.html

clean: clean-test
	@rm -rf vendor
	@rm -f composer.lock
	@rm -rf public/css

styles:
	@compass compile --force

dev-symlink:
ifndef PROJECT
	$(error PROJECT must be a defined variable pointing to the project directory to symlink this to)
endif
	@rm -rf $(PROJECT)/vendor/$(VENDOR)/$(PACKAGE)
	@mkdir -p $(PROJECT)/vendor/$(VENDOR)/
	@ln -s . $(PROJECT)/vendor/$(VENDOR)/$(PACKAGE)
