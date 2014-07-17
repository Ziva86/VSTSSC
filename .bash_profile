export PS1="Mare_Car-> "
alias ll='ls -lahG'

if [-f ~/.git-completion.bash ]; then
	source ~/git-completion.bash
	export PS1='\W$(__git_ps1 "(%s)") >'
fi