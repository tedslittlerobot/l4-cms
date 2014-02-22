VENDOR=tlr
PACKAGE=l4-cms

install: clean styles
	@composer install

clean: clean-test clean-styles
	@rm -rf vendor
	@rm -f composer.lock

clean-test:
	@rm -rf report

clean-styles:
	@rm -rf public/css
	@rm -rf src/scss-min

test:
	@phpunit

coverage:
	@phpunit --coverage-html ./report

report: coverage
	@open ./report/index.html

copy-styles:
	@cp -r src/scss src/scss-min
	@mv src/scss-min/admin.scss src/scss-min/admin.min.scss
	@mv src/scss-min/public.scss src/scss-min/public.min.scss

styles: clean-styles copy-styles
	@compass compile
	@compass compile -e production
	@rm -rf src/scss-min

dev-symlink:
ifndef PROJECT
	$(error PROJECT must be a defined variable pointing to the project directory to symlink this to)
endif
	@rm -rf $(PROJECT)/vendor/$(VENDOR)/$(PACKAGE)
	@mkdir -p $(PROJECT)/vendor/$(VENDOR)/
	@ln -s . $(PROJECT)/vendor/$(VENDOR)/$(PACKAGE)
