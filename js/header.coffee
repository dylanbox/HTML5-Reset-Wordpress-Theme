# Use local alias
$ = jQuery

class Header
  constructor: (el) ->
    @$el = el

  collapseHeader: (windowTop) =>
    elHeight = @$el.outerHeight()
    if windowTop > elHeight
      @$el.addClass "collapse"
    else
      @$el.removeClass "collapse"
    return


class MobileNav
  constructor: (el) ->
    @$el = el

  activateNav: ->
    unless @$el.hasClass 'active'
      @$el.addClass 'active'

  deactivateNav: ->
    if @$el.hasClass 'active'
      @$el.removeClass 'active'

topPadding = () ->
  $el = $('#header')
  headerHeight = $el.outerHeight()
  $('#pageContent').css 'padding-top', headerHeight

# On page-ready
$ ->
  # create new instance of Header class
  header = new Header($('#header'))

  # create new instance of the MobileNav class
  mobileNav = new MobileNav($('#mobileNav'))

  $('#mobileNavButton').click (event) ->
    event.stopPropagation()
    event.preventDefault()
    mobileNav.activateNav()
    return

  $('#pageWrapper').click (event)->
    event.stopPropagation()
    mobileNav.deactivateNav()
    return

  $(window).scroll ->
    header.collapseHeader($(window).scrollTop())

  topPadding()

  $(window).resize ->
    topPadding()